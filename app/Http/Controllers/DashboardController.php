<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('layouts.admin.dashboard');
    }
    public function perangkat(){
        return view('layouts.admin.perangkat.index');
    }

    public function pegawai(){
        return view('layouts.admin.pegawai.index');
    }

    public function pengantar(){
        return view('layouts.admin.katapengantar.index');
    }

    public function daftar(){
        return view('layouts.admin.daftarisi.index');
    }

    public function bab1(){
        return view('layouts.admin.bab1.index');
    }
}
