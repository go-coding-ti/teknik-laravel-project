<?php

namespace App\Http\Controllers\admin;


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

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('admin.dosen.listdosen', compact('data','profiledata'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();

            $statusaktif = MasterStatusKeaktifan::all();
            $statusDosen = MasterStatusDosen::all();
            $pangkatDosen = MasterPangkatPns::all();
            $jabatanDosen = MasterJabatanFungsional::all();
            $statusKepegawaian = MasterStatusKepegawaian::all();
            $unit = Fakultas::all();
            $subunit = Prodi::all();
            return view('admin.dosen.formdosen', compact('statusDosen', 'pangkatDosen', 'jabatanDosen', 'unit','subunit','statusaktif','statusKepegawaian','profiledata'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute Wajib Diisi!',
            'unique' => 'Kolom :attribute Tidak Boleh Sama!',
		];

        $this->validate($request, [
            'nidn' => 'required',
            'jenisserdos' => 'required',
            'nip' => 'required|unique:tb_dosen',
            'profile_image' => 'required',
            'gelardepan' => 'required',
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
            'filekarpeg' => 'required|max:8000',
            'nonpwp' => 'required',
            'filenpwp' => 'required|max:8000',
            'nokaris' => 'required',
            'filekaris' => 'required|max:8000',
            'noktp' => 'required',
            'filektp' => 'required|max:8000',
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
        
        $images = null;
        $karpeg = null;
        $npwp = null;
        $karis = null;
        $ktp = null;
        $dosen = new Dosen;
        if($request->file('profile_image')){
            //simpan file
            $file = $request->file('profile_image');
            $images = time()."_".$file->getClientOriginalName();
            $dosen->foto = $images;

            $foto_upload = 'img';
            $file->move($foto_upload,$images);
        }
        if($request->file('filekarpeg')){
            //simpan file
            $file = $request->file('filekarpeg');
            $karpeg = time()."_".$file->getClientOriginalName();
            $dosen->file_karpeg = $karpeg;

            $karpeg_upload = 'karpeg';
            $file->move($karpeg_upload,$karpeg);
        }
        if($request->file('filenpwp')){
            //simpan file
            $file = $request->file('filenpwp');
            $npwp = time()."_".$file->getClientOriginalName();
            $dosen->file_npwp = $npwp;

            $npwp_upload = 'npwp';
            $file->move($npwp_upload,$npwp);
        }
        if($request->file('filekaris')){
            //simpan file
            $file = $request->file('filekaris');
            $karis = time()."_".$file->getClientOriginalName();
            $dosen->file_karis_karsu = $karis;

            $karis_upload = 'karis';
            $file->move($karis_upload,$karis);
        }
        if($request->file('filektp')){
            //simpan file
            $file = $request->file('filektp');
            $ktp = time()."_".$file->getClientOriginalName();
            $dosen->file_ktp = $ktp;

            $ktp_upload = 'ktp';
            $file->move($ktp_upload,$ktp);
        }
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->password = Hash::make($request->nip);
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
        if($dosen->save()){
            $aktif = new MasterKeaktifan;
            $aktif->nip = $request->nip;
            $aktif->id_status_keaktifan = $request->statusaktif;
            $aktif->tmt_keaktifan = $request->tmtaktif;
            $aktif->save();
    
            $fungsi = new TmtKepangkatanFungsional;
            $fungsi->nip = $request->nip;
            $fungsi->id_pangkat_pns = $request->pangkatGolongan;
            $fungsi->unit = $request->unit;
            $fungsi->tmt_pangkat_golongan = $request->tmtpangkatgolongan;
            $fungsi->save();
    
            $jabat = new TmtJabatanFungsional;
            $jabat->id_jabatan_fungsional = $request->jabatanakademik;
            $jabat->nip = $request->nip;
            $jabat->tmt_jabatan_fungsional = $request->tmtjabatan;
            $jabat->save();
    
            $didik = new MasterIdPendidik;
            $didik->nip = $request->nip;
            $didik->jenis_id = $request->jenisserdos;
            $didik->nidn_nidk_nup = $request->nidn;
            $didik->save();
    
            $hispendik = new MasterPendidikan;
            $hispendik->nip = $request->nip;
            $hispendik->jenjang_pendidikan_terakhir=$request->jenjangPendidikan;
            $hispendik->nama_institusi = $request->institusi;
            $hispendik->bidang_ilmu = $request->bidangIlmu;
            $hispendik->tanggal_selesai_studi = $request->tanggalSelesaiStudi;
            $hispendik->save();
    
            $status = new TmtStatusDosen;
            $status->nip = $request->nip;
            $status->id_status_dosen = $request->statusdosen;
            $status->tmt_status_dosen = $request->tmtStatusDosen;
            $status->save();

            $kepeg = new TmtStatusKepegawaianDosen;
            $kepeg->id_status_kepegawaian = $request->statusKepegawaian;
            $kepeg->nip = $request->nip;
            $kepeg->tmt_status_kepegawaian_dosen = $request->tmtStatusKepegawaian;
            $kepeg->save();
            return redirect()->route('dosen-page')->with('success','Berhasil Menambah Data Dosen!');
        }else{
            return redirect()->route('dosen-page')->with('error','Gagal Menambah Data Dosen!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::where('nip', '=', $id);
        $dosen->delete();
        return redirect()->route('dosen-page')->with('success','Berhasil Menghapus Data Dosen!');
    }

    public function detailDosen($id, Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $dosen = Dosen::with('tmtpangkat')->where('nip','=',$id)->first();
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();

            $statusaktif = MasterStatusKeaktifan::all();
            $statusDosen = MasterStatusDosen::all();
            $pangkatDosen = MasterPangkatPns::all();
            $jabatanDosen = MasterJabatanFungsional::all();
            $statusKepegawaian = MasterStatusKepegawaian::all();
            $unit = Fakultas::all();
            $subunit = Prodi::all();
            return view('admin.dosen.formdosenedit',compact('statusDosen', 'pangkatDosen', 'jabatanDosen', 'unit','subunit','statusaktif','statusKepegawaian','profiledata','dosen'));
        }
        
    }
}
