<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $data = [
                'title' => 'Dashboard Admin',
                'message' => 'Selamat datang di Dashboard Admin',
            ];
        } elseif ($user->role == 'opd') {
            $data = [
                'title' => 'Dashboard OPD',
                'message' => 'Selamat datang di Dashboard OPD',
                'kode_opd' => $user->kode_opd, // Misalnya kode_opd disimpan di model User
            ];
        } else {
            return response()->view('errors.403', [], 403);
        }

        // Return the view with the correct data
        return view('layouts.admin.dashboard', $data);
    }

    public function perangkat()
    {
        return view('layouts.admin.perangkat.index');
    }

    public function pegawai()
    {
        return view('layouts.admin.pegawai.index');
    }

    public function pengantar()
    {
        return view('layouts.admin.katapengantar.index');
    }

    public function daftar()
    {
        return view('layouts.admin.daftarisi.index');
    }

    public function bab1()
    {
        return view('layouts.admin.bab1.index');
    }

    public function create_bab1()
    {
        return view('layouts.admin.bab1.create');
    }

    public function bab2()
    {
        return view('layouts.admin.bab2.index');
    }

    public function create_bab2()
    {
        return view('layouts.admin.bab2.create');
    }

    public function bab3()
    {
        return view('layouts.admin.bab3.index');
    }
}