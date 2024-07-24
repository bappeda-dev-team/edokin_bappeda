<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OPDController;
use Illuminate\Http\Request;

Route::get('/dashboard/perangkat', [App\Http\Controllers\DashboardController::class, 'perangkat'])->name('layouts.admin.perangkat.index');

Route::middleware('auth.api')->get('/daftar_opd', function(Request $request){
    return $request->daftar_opd();
});