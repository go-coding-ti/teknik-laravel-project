<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
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

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusaktif = MasterStatusKeaktifan::all();
        $statusDosen = MasterStatusDosen::all();
        $pangkatDosen = MasterPangkatPns::all();
        $jabatanDosen = MasterJabatanFungsional::all();
        $unit = Fakultas::all();
        return view('admin.formdosen', compact('statusDosen', 'pangkatDosen', 'jabatanDosen', 'unit', 'statusaktif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $dosen->save();

        $aktif = new MasterKeaktifan;
        $aktif->nip = $request->nip;
        $aktif->id_status_keaktifan = $request->statusaktif;
        $aktif->tmt_keaktifan = $request->tmtaktif;
        $aktif->save();

        return redirect()->route('admin-home');
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
        $statusDosen = MasterKeaktifan::where('nip', '=', $id);
        $idpendidik = MasterIdPendidik::where('nip', '=', $id);
        $tmtjabatan = TmtJabatanFungsional::where('nip', '=', $id);
        $tmtpangkat = TmtKepangkatanFungsional::where('nip', '=', $id);
        $dosen = Dosen::where('nip', '=', $id);
        $statusDosen->delete();
        $idpendidik->delete();
        $tmtjabatan->delete();
        $tmtpangkat->delete();
        $dosen->delete();
        
        return redirect()->route('admin-home');
    }

    public function detailDosen($id){
    $dosen = Dosen::where('nip','=',$id)->first();

    return "
    <table class='table table-borderless'>
    <tbody>
        <tr>
            <td>NIP</td>
            <td>{$dosen->nip}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{$dosen->nama}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>{$dosen->nip}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>{$dosen->nip}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>{$dosen->nip}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>{$dosen->nip}</td>
        </tr>
    </tbody>
</table>
                
    ";    
}
}
