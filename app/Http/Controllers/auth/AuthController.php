<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Dosen;
use App\Pegawai;


class AuthController extends Controller
{
    public function loginpage(Request $request){
        $cekad = $request->session()->get('admin.data');
        $cekdos = $request->session()->get('dosen.data');
        if(!is_null($cekdos)){
            return redirect('/dashboard');
        }elseif(!is_null($cekad)){
            return redirect('/admin/dashboard');
        }else{
            return view('auth.login');
        }
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(!$request->session()->has('admin')||!$request->session()->has('dosen')){
            $iddosen = Dosen::select('nip')->where('nip','=',$username)->first();
            $idpegawai = Pegawai::select('nip')->where('nip','=',$username)->first();
            $validdosen = Dosen::where('nip','=',$username)->first();
            $validpeg = Pegawai::where('nip','=',$username)->first();
            if($validdosen==null && $validpeg!=null){
                if(Hash::check($password, $validpeg->password)){
                    $request->session()->put('admin',['data'=>$validpeg, 'check'=>'admin']);
                    $get=$request->session()->get('admin');
                    return redirect('/admin/dashboard');
                }else{
                    return redirect('/login')->with('alert','Password Salah!');
                }
            }elseif($validdosen!=null && $validpeg==null){
                if(Hash::check($password, $validdosen->password)){
                    $request->session()->put('dosen',['data'=>$validdosen, 'check'=>'dosen']);
                    $get=$request->session()->get('dosen');
                    return redirect('/dashboard');
                }else{
                    return redirect('/login')->with('alert','Password Salah!');
                }
            }else{
                return redirect('/login')->with('alert','Username Salah!');
            }
        }else{
            $cekad = $request->session()->get('admin.data');
            $cekdos = $request->session()->get('dosen.data');
            if(!is_null($cekdos)){
                return redirect('/dashboard');
            }elseif(!is_null($cekad)){
                return redirect('/admin/dashboard');
            }
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
