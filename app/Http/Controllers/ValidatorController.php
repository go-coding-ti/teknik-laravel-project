<?php

namespace App\Http\Controllers;

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
        //
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
        $idpendidik = MasterIdPendidik::where('nip', '=', $id);
        $tmtjabatan = TmtJabatanFungsional::where('nip', '=', $id);
        $tmtpangkat = TmtKepangkatanFungsional::where('nip', '=', $id);
        $dosen = Dosen::where('nip', '=', $id);
        $idpendidik->delete();
        $tmtjabatan->delete();
        $tmtpangkat->delete();
        $dosen->delete();
        
        return redirect()->route('admin-home');
    }
}
