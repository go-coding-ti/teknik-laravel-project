<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;

class HomeController extends Controller
{
    public function home(Request $request){
        if(!$request->session()->has('dosen')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $user = $request->session()->get('dosen.data');
            $profiledata = Dosen::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('user.dashboard', compact('data','profiledata'));
        }
    }
}
