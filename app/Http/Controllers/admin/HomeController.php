<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;

class HomeController extends Controller
{
    public function home(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/admin/login')->with('expired','Session Telah Berakhir');
        }else{
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Dosen::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            // dd($profiledata);
            return view('admin.homeadmin', compact('data','profiledata'));
        }
    }
}
