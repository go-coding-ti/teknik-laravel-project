<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;

class HomeController extends Controller
{
    public function home(){


        $data = Dosen::get();
        // dd(isset($data));
        return view('admin.homeadmin', compact('data'));
    }
}
