<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
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

    public function storechangepass(Request $request){
        $messages = [
            'required' => 'Kolom :attribute Wajib Diisi!',
            'unique' => 'Kolom :attribute Tidak Boleh Sama!',
            'min' => 'Kolom :attribute harus diisi minimal 8 karakter!',
            'same' => 'Kolom :attribute harus sama dengan kolom Passwor Baru',
		];

        $this->validate($request, [
            'oldpass' => 'required',
            'newpass' => 'required|min:8',
            'confirmpass' => 'required|same:newpass',
        ],$messages);

        $user = $request->session()->get('dosen.data');
        $profiledata = Dosen::where('nip','=', $user["nip"])->first();
        if(Hash::check($request->oldpass, $profiledata->password)){
            $password = Hash::make($request->newpass);
            $dos = Dosen::find($profiledata->nip);
            $dos->password = $password;
            $dos->change_password = 1;
            $dos->update();
            return redirect()->route('user-home')->with('success','Berhasil Merubah Password!');
        }else{
            return redirect()->route('user-changepass')->with('error','Password Lama tidak cocok!');
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

    public function updatedataDosen(Request $request, $id)
    {
        $messages = [
            'required' => 'Kolom :attribute Wajib Diisi!',
            'unique' => 'Kolom :attribute Tidak Boleh Sama!',
		];

        $validator = Validator::make($request->all(),[
            'nidn' => 'required',
            'jenisserdos' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'gelarbelakang' => 'required',
            'statusdosen' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required',
            'alamatdomisili' => 'required',
            'alamatrumah' => 'required',
            'telprumah' => 'required',
            'nohp' => 'required',
            'email' => 'required|email',
            'pangkatGolongan' => 'required',
            'jabatanakademik' => 'required',
            'tmtpangkatgolongan' => 'required',
            'tmtjabatan' => 'required',
            'unit' => 'required',
            'subunit' => 'required',
            'nokarpeg' => 'required',
            'filekarpeg' => 'mimetypes:application/pdf|max:8000',
            'nonpwp' => 'required',
            'filenpwp' => 'mimetypes:application/pdf|max:8000',
            'nokaris' => 'required',
            'filekaris' => 'mimetypes:application/pdf|max:8000',
            'noktp' => 'required',
            'filektp' => 'mimetypes:application/pdf|max:8000',
            'statusaktif' => 'required',
            'tmtaktif' => 'required',
            'jenjangPendidikan' => 'required',
            'institusi' => 'required',
            'bidangIlmu' => 'required',
            'tanggalSelesaiStudi' => 'required',
            'tmtStatusDosen' => 'required',
            'statusKepegawaian' => 'required',
            'tmtStatusKepegawaian' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $images = null;
        $karpeg = null;
        $npwp = null;
        $karis = null;
        $ktp = null;
        $dosen = Dosen::find($id);
        if($request->file('profile_image')){
            //simpan file
            $file = $request->file('profile_image');
            $images = time()."_".$file->getClientOriginalName();
            $dosen->foto = $images;

            $foto_upload = 'img';
            $file->move($foto_upload,$images);
        }else{
            $dosen->foto = $dosen->foto;
        }
        if($request->file('filekarpeg')){
            //simpan file
            $file = $request->file('filekarpeg');
            $karpeg = time()."_".$file->getClientOriginalName();
            $dosen->file_karpeg = $karpeg;

            $karpeg_upload = 'karpeg';
            $file->move($karpeg_upload,$karpeg);
        }else{
            $dosen->file_karpeg = $dosen->file_karpeg;
        }
        if($request->file('filenpwp')){
            //simpan file
            $file = $request->file('filenpwp');
            $npwp = time()."_".$file->getClientOriginalName();
            $dosen->file_npwp = $npwp;

            $npwp_upload = 'npwp';
            $file->move($npwp_upload,$npwp);
        }else{
            $dosen->file_npwp = $dosen->file_npwp;
        }
        if($request->file('filekaris')){
            //simpan file
            $file = $request->file('filekaris');
            $karis = time()."_".$file->getClientOriginalName();
            $dosen->file_karis_karsu = $karis;

            $karis_upload = 'karis';
            $file->move($karis_upload,$karis);
        }else{
            $dosen->file_karis_karsu = $dosen->file_karis_karsu;
        }
        if($request->file('filektp')){
            //simpan file
            $file = $request->file('filektp');
            $ktp = time()."_".$file->getClientOriginalName();
            $dosen->file_ktp = $ktp;

            $ktp_upload = 'ktp';
            $file->move($ktp_upload,$ktp);
        }else{
            $dosen->file_ktp = $dosen->file_ktp;
        }
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->id_prodi = $request->subunit;
        $dosen->gelar_depan = $request->gelardepan;
        $dosen->gelar_belakang = $request->gelarbelakang;
        $dosen->jenis_kelamin = $request->jeniskelamin;
        $dosen->tempat_lahir = $request->tempatlahir;
        $dosen->tanggal_lahir = $request->tanggallahir;
        $dosen->alamat_domisili = $request->alamatdomisili;
        $dosen->alamat_rumah = $request->alamatrumah;
        $dosen->telp_rumah = $request->telprumah;
        $dosen->no_hp = $request->nohp;
        $dosen->email_aktif = $request->email;
        $dosen->no_karpeg = $request->nokarpeg;
        $dosen->no_npwp = $request->nonpwp;
        $dosen->no_karis_karsu = $request->nokaris;
        $dosen->no_ktp = $request->noktp;
        if($dosen->update()){
            $aktif = MasterKeaktifan::where('nip','=',$dosen->nip)->first();
            if(!isset($aktif)){
                $aktifs = new MasterKeaktifan;
                $aktifs->nip = $dosen->nip;
                $aktifs->id_status_keaktifan = $request->statusaktif;
                $aktifs->tmt_keaktifan = $request->tmtaktif;
                $aktifs->save();
            }else{
                $aktif->nip = $dosen->nip;
                $aktif->id_status_keaktifan = $request->statusaktif;
                $aktif->tmt_keaktifan = $request->tmtaktif;
                $aktif->update();
            }
    
            $fungsi = TmtKepangkatanFungsional::where('nip','=',$dosen->nip)->first();
            if(!isset($fungsi)){
                $fungsis = new TmtKepangkatanFungsional;
                $fungsis->nip = $dosen->nip;
                $fungsis->id_pangkat_pns = $request->pangkatGolongan;
                $fungsis->unit = $request->unit;
                $fungsis->tmt_pangkat_golongan = $request->tmtpangkatgolongan;
                $fungsis->save();
            }else{
                $fungsi->nip = $dosen->nip;
                $fungsi->id_pangkat_pns = $request->pangkatGolongan;
                $fungsi->unit = $request->unit;
                $fungsi->tmt_pangkat_golongan = $request->tmtpangkatgolongan;
                $fungsi->update();
            }
    
            $jabat = TmtJabatanFungsional::where('nip','=',$dosen->nip)->first();
            if(!isset($jabat)){
                $jabats = new TmtJabatanFungsional;
                $jabats->id_jabatan_fungsional = $request->jabatanakademik;
                $jabats->nip = $dosen->nip;
                $jabats->tmt_jabatan_fungsional = $request->tmtjabatan;
                $jabats->save();
            }else{
                $jabat->id_jabatan_fungsional = $request->jabatanakademik;
                $jabat->nip = $dosen->nip;
                $jabat->tmt_jabatan_fungsional = $request->tmtjabatan;
                $jabat->update();
            }
    
            $didik = MasterIdPendidik::where('nip','=',$dosen->nip)->first();
            if(!isset($didik)){
                $didiks = new MasterIdPendidik;
                $didiks->nip = $dosen->nip;
                $didiks->jenis_id = $request->jenisserdos;
                $didiks->nidn_nidk_nup = $request->nidn;
                $didiks->save();
            }else{
                $didik->nip = $dosen->nip;
                $didik->jenis_id = $request->jenisserdos;
                $didik->nidn_nidk_nup = $request->nidn;
                $didik->update();
            }
    
            $hispendik = MasterPendidikan::where('nip','=',$dosen->nip)->first();
            if(!isset($hispendik)){
                $hispendiks = new MasterPendidikan;
                $hispendiks->nip = $dosen->nip;
                $hispendiks->jenjang_pendidikan_terakhir=$request->jenjangPendidikan;
                $hispendiks->nama_institusi = $request->institusi;
                $hispendiks->bidang_ilmu = $request->bidangIlmu;
                $hispendiks->tanggal_selesai_studi = $request->tanggalSelesaiStudi;
                $hispendiks->save();
            }else{
                $hispendik->nip = $dosen->nip;
                $hispendik->jenjang_pendidikan_terakhir=$request->jenjangPendidikan;
                $hispendik->nama_institusi = $request->institusi;
                $hispendik->bidang_ilmu = $request->bidangIlmu;
                $hispendik->tanggal_selesai_studi = $request->tanggalSelesaiStudi;
                $hispendik->update();
            }
    
            $status = TmtStatusDosen::where('nip','=',$dosen->nip)->first();
            if(!isset($status)){
                $statuss = new TmtStatusDosen;
                $statuss->nip = $dosen->nip;
                $statuss->id_status_dosen = $request->statusdosen;
                $statuss->tmt_status_dosen = $request->tmtStatusDosen;
                $statuss->save();
            }else{
                $status->nip = $dosen->nip;
                $status->id_status_dosen = $request->statusdosen;
                $status->tmt_status_dosen = $request->tmtStatusDosen;
                $status->update();
            }

            $kepeg = TmtStatusKepegawaianDosen::where('nip','=',$dosen->nip)->first();
            if(!isset($kepeg)){
                $kepegs = new TmtStatusKepegawaianDosen;
                $kepegs->id_status_kepegawaian = $request->statusKepegawaian;
                $kepegs->nip = $dosen->nip;
                $kepegs->tmt_status_kepegawaian_dosen = $request->tmtStatusKepegawaian;
                $kepegs->save();
            }else{
                $kepeg->id_status_kepegawaian = $request->statusKepegawaian;
                $kepeg->nip = $dosen->nip;
                $kepeg->tmt_status_kepegawaian_dosen = $request->tmtStatusKepegawaian;
                $kepeg->update();
            }
            return redirect()->route('user-data')->with('success','Berhasil Mengupdate Data Dosen!');
        }else{
            return redirect()->route('user-data')->with('error','Gagal Mengupdate Data Dosen!');
        }
    }
}
