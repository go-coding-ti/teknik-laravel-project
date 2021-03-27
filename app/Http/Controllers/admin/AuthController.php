<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginpage(Request $request){
        if(!$request->session()->has('admin')){
            return view('auth.login');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function loginadmin(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(!$request->session()->has('admin')){
            $id = Dosen::select('nip')->where('nip','=',$username)->first();
            $validate = Dosen::where('nip','=',$username)->first();
            if($validate!=null){
                if(Hash::check($password, $validate->password)){
                    $request->session()->put('admin',['id'=>$id, 'data'=>$validate]);
                    $get=$request->session()->get('admin');
                    return redirect('/admin/dashboard');
                }else{
                    return redirect('/admin/login')->with('alert','Password Salah!');
                }
            }else{
                return redirect('/admin/login')->with('alert','Username Salah!');
            }
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/login');
    }
}
