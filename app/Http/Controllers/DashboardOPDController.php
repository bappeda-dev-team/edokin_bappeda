<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardOPDController extends Controller
{
    //
    public function index()
    {
        return view('layouts.opd.dashboard');
        // return redirect()->route('layouts.opd.dashboard');
    }
}
