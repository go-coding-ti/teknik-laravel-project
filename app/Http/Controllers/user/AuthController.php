<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginpage(Request $request){
        if(!$request->session()->has('user')){
            return view('auth.login');
        }else{
            return redirect('/user/dashboard');
        }
    }

    public function loginuser(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(!$request->session()->has('user')){
            $id = Admin::select('nip')->where('nip','=',$username)->first();
            $validate = Admin::where('nip','=',$username)->first();
            if($validate!=null){
                if(Hash::check($password, $validate->password)){
                    $request->session()->put('user',['id'=>$id, 'data'=>$validate]);
                    $get=$request->session()->get('user');
                    return redirect('/user/dashboard');
                }else{
                    return redirect('/user/login')->with('alert','Password Salah!');
                }
            }else{
                return redirect('/user/login')->with('alert','Username Salah!');
            }
        }else{
            return redirect('/user/dashboard');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/user/login');
    }
}
