<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KategoriPenelitian;
use App\Dosen;
use App\Pegawai;
use App\Penelitian;
use App\Penulis;
use App\DetailPenelitian;
use App\MasterTahunAjaran;

class PenelitianController extends Controller
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
            $kategori = KategoriPenelitian::all();
            $datapenelitian = Penelitian::all();
            $tahunajaran = MasterTahunAjaran::all();
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('admin.penelitian.penelitian', compact('kategori', 'datapenelitian', 'tahunajaran', 'data', 'profiledata'));
        }
        
        // $id = $kategori->id_kategori_penelitian;
        // dd($kategori->id_kategori_penelitian);
    }

    public function detail(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $kategori = KategoriPenelitian::all();
            $datapenelitian = Penelitian::where('id_penelitian', $request->id)->first();
            $idpenulis = DetailPenelitian::where('id_penelitian', $request->id)->get();
            $tahunajaran = MasterTahunAjaran::where('id', $datapenelitian->tahun_ajaran)->first(); 
            if($idpenulis != null){
                foreach($idpenulis as $i){
                    if(Penulis::where('id_penulis', $i->id_penulis)->first()->penulis_ke != null){
                        $penulis[] = Penulis::where('id_penulis', $i->id_penulis)->orderBy('penulis_ke', 'asc')->first();
                    }
                    else{
                        $penulis[] = Penulis::where('id_penulis', $i->id_penulis)->first();
                    }
                }
            }
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('admin.penelitian.penelitian-detail', compact('kategori', 'penulis', 'datapenelitian', 'data', 'profiledata', 'tahunajaran'));
        }
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
        //update data penelitian

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
