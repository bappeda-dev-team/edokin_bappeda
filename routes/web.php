<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bab1Controller;
use App\Http\Controllers\Bab3Controller;
use App\Http\Controllers\Bab2Controller;
use App\Http\Controllers\Bab4Controller;
use App\Http\Controllers\Bab5Controller;
use App\Http\Controllers\Bab6Controller;
use App\Http\Controllers\Bab7Controller;
use App\Http\Controllers\Bab8Controller;
use App\Http\Controllers\OPDController;
use App\Http\Controllers\PegawaiController;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Bab1;
use App\Models\Bab2;
use App\Models\Bab3;
use App\Models\Bab4;

Route::get('/', function () {
    return redirect()->route('login'); // Redirect to login page
    
});

// Authentication routes
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('layouts.admin.dashboard');


// // Publicly accessible home route
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Group of routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('layouts.admin.dashboard');

    Route::get('/dashboard/perangkat', [OPDController::class, 'perangkat'])->name('layouts.admin.perangkat.index');
    Route::get('/dashboard/pegawai', [PegawaiController::class, 'pegawai'])->name('layouts.admin.pegawai.index');
    Route::get('/dashboard/kata-pengantar', [App\Http\Controllers\DashboardController::class, 'pengantar'])->name('layouts.admin.katapengantar.index');
    Route::get('/dashboard/daftar-isi', [App\Http\Controllers\DashboardController::class, 'daftar'])->name('layouts.admin.daftarisi.index');
    
    Route::get('/dashboard/create-bab1', [Bab1Controller::class, 'create'])->name('bab1.create');
    Route::post('/dashboard/store-bab1', [Bab1Controller::class, 'store'])->name('bab1.store');
    Route::get('/dashboard/edit-bab1/{id}', [Bab1Controller::class, 'edit'])->name('bab1.edit');
    Route::get('/dashboard/show-bab1/{id}', [Bab1Controller::class, 'show'])->name('bab1.show');
    Route::put('/dashboard/update-bab1/{id}', [Bab1Controller::class, 'update'])->name('bab1.update');
    Route::delete('/dashboard/delete-bab1/{id}', [Bab1Controller::class, 'destroy'])->name('bab1.destroy');
    Route::get('/dashboard/bab1', [Bab1Controller::class, 'index'])->name('layouts.admin.bab1.index');
    
    Route::get('/dashboard/create-bab2', [Bab2Controller::class, 'create'])->name('bab2.create');
    Route::post('/dashboard/store-bab2', [Bab2Controller::class, 'store'])->name('bab2.store');
    Route::get('/dashboard/edit-bab2/{id}', [Bab2Controller::class, 'edit'])->name('bab2.edit');
    Route::get('/dashboard/show-bab2/{id}', [Bab2Controller::class, 'show'])->name('bab2.show');
    Route::put('/dashboard/update-bab2/{id}', [Bab2Controller::class, 'update'])->name('bab2.update');
    Route::delete('/dashboard/delete-bab2/{id}', [Bab2Controller::class, 'destroy'])->name('bab2.destroy');
    Route::get('/dashboard/bab2', [Bab2Controller::class, 'index'])->name('layouts.admin.bab2.index');

    Route::get('/dashboard/create-bab3', [Bab3Controller::class, 'create'])->name('bab3.create');
    Route::post('/dashboard/store-bab3', [Bab3Controller::class, 'store'])->name('bab3.store');
    Route::get('/dashboard/edit-bab3/{id}', [Bab3Controller::class, 'edit'])->name('bab3.edit');
    Route::get('/dashboard/show-bab3/{id}', [Bab3Controller::class, 'show'])->name('bab3.show');
    Route::put('/dashboard/update-bab3/{id}', [Bab3Controller::class, 'update'])->name('bab3.update');
    Route::delete('/dashboard/delete-bab3/{id}', [Bab3Controller::class, 'destroy'])->name('bab3.destroy');
    Route::get('/dashboard/bab3', [Bab3Controller::class, 'index'])->name('layouts.admin.bab3.index');

    Route::get('/dashboard/create-bab4', [Bab4Controller::class, 'create'])->name('bab4.create');
    Route::post('/dashboard/store-bab4', [Bab4Controller::class, 'store'])->name('bab4.store');
    Route::get('/dashboard/edit-bab4/{id}', [Bab4Controller::class, 'edit'])->name('bab4.edit');
    Route::get('/dashboard/show-bab4/{id}', [Bab4Controller::class, 'show'])->name('bab4.show');
    Route::put('/dashboard/update-bab4/{id}', [Bab4Controller::class, 'update'])->name('bab4.update');
    Route::delete('/dashboard/delete-bab4/{id}', [Bab4Controller::class, 'destroy'])->name('bab4.destroy');
    Route::get('/dashboard/bab4', [Bab4Controller::class, 'index'])->name('layouts.admin.bab4.index');
    
    Route::get('/dashboard/bab5', [Bab5Controller::class, 'index'])->name('layouts.admin.bab5.index');
    Route::get('/dashboard/create-bab5', [Bab5Controller::class, 'create'])->name('bab5.create');
    Route::post('/dashboard/store-bab5', [Bab5Controller::class, 'store'])->name('bab5.store');
    Route::get('/dashboard/edit-bab5/{id}', [Bab5Controller::class, 'edit'])->name('bab5.edit');
    Route::get('/dashboard/show-bab5/{id}', [Bab5Controller::class, 'show'])->name('bab5.show');
    Route::put('/dashboard/update-bab5/{id}', [Bab5Controller::class, 'update'])->name('bab5.update');
    Route::delete('/dashboard/delete-bab5/{id}', [Bab5Controller::class, 'destroy'])->name('bab5.destroy');
    
    Route::get('/dashboard/bab6', [Bab6Controller::class, 'index'])->name('layouts.admin.bab6.index');
    Route::get('/dashboard/create-bab6', [Bab6Controller::class, 'create'])->name('bab6.create');
    Route::post('/dashboard/store-bab6', [Bab6Controller::class, 'store'])->name('bab6.store');
    Route::get('/dashboard/edit-bab6/{id}', [Bab6Controller::class, 'edit'])->name('bab6.edit');
    Route::get('/dashboard/show-bab6/{id}', [Bab6Controller::class, 'show'])->name('bab6.show');
    Route::put('/dashboard/update-bab6/{id}', [Bab6Controller::class, 'update'])->name('bab6.update');
    Route::delete('/dashboard/delete-bab6/{id}', [Bab6Controller::class, 'destroy'])->name('bab6.destroy');

    Route::get('/dashboard/bab7', [Bab7Controller::class, 'index'])->name('layouts.admin.bab7.index');
    Route::get('/dashboard/create-bab7', [Bab7Controller::class, 'create'])->name('bab7.create');
    Route::post('/dashboard/store-bab7', [Bab7Controller::class, 'store'])->name('bab7.store');
    Route::get('/dashboard/edit-bab7/{id}', [Bab7Controller::class, 'edit'])->name('bab7.edit');
    Route::get('/dashboard/show-bab7/{id}', [Bab7Controller::class, 'show'])->name('bab7.show');
    Route::put('/dashboard/update-bab7/{id}', [Bab7Controller::class, 'update'])->name('bab7.update');
    Route::delete('/dashboard/delete-bab7/{id}', [Bab7Controller::class, 'destroy'])->name('bab7.destroy');

    Route::get('/dashboard/bab8', [Bab8Controller::class, 'index'])->name('layouts.admin.bab8.index');
    Route::get('/dashboard/create-bab8', [Bab8Controller::class, 'create'])->name('bab8.create');
    Route::post('/dashboard/store-bab8', [Bab8Controller::class, 'store'])->name('bab8.store');
    Route::get('/dashboard/edit-bab8/{id}', [Bab8Controller::class, 'edit'])->name('bab8.edit');
    Route::get('/dashboard/show-bab8/{id}', [Bab8Controller::class, 'show'])->name('bab8.show');
    Route::put('/dashboard/update-bab8/{id}', [Bab8Controller::class, 'update'])->name('bab8.update');
    Route::delete('/dashboard/delete-bab8/{id}', [Bab8Controller::class, 'destroy'])->name('bab8.destroy');
    // Route::get('/tujuan-opd/{kode_opd}', [Bab4Controller::class, 'index']);
    
    Route::get('/dashboard/bab1/export-pdf/{id}', [Bab1Controller::class, 'exportPdf'])->name('bab1.exportPdf');
    Route::get('/dashboard/bab1/export-word/{id}', [Bab1Controller::class, 'exportWord'])->name('bab1.exportWord');
    Route::get('/dashboard/bab2/export-pdf/{id}', [Bab2Controller::class, 'exportPdf'])->name('bab2.exportPdf');
    
    Route::get('/dashboard/bab3/export-pdf/{id}', [Bab3Controller::class, 'exportPdf'])->name('bab3.exportPdf');
    Route::get('/dashboard/bab4/export-pdf/{id}', [Bab4Controller::class, 'exportPdf'])->name('bab4.exportPdf');
    Route::get('/dashboard/bab5/export-pdf/{id}', [Bab5Controller::class, 'exportPdf'])->name('bab5.exportPdf');
    Route::get('/dashboard/bab6/export-pdf/{id}', [Bab6Controller::class, 'exportPdf'])->name('bab6.exportPdf');
    Route::get('/dashboard/bab7/export-pdf/{id}', [Bab7Controller::class, 'exportPdf'])->name('bab7.exportPdf');
    Route::get('/dashboard/bab8/export-pdf/{id}', [Bab8Controller::class, 'exportPdf'])->name('bab8.exportPdf');
    
    
    // Route::delete('/dashboard/delete-bab1/{id}', [Bab1Controller::class, 'destroy'])->name('bab1.destroy');
    Route::get('/api/urusan_opd/{kode_opd}', [Bab1Controller::class, 'getUrusanOpd']);
    Route::get('/api/strategi-arah-kebijakan/{tahun}/{kode_opd}', [Bab5Controller::class, 'getStrategiArahKebijakan']);
    // Route::get('/api/bidang_urusan/{kode_bidang_urusan}', [Bab1Controller::class, 'getBidangUrusan']);
    // Route::get('/get-bidang-urusan/{kode_opd}', [Bab1Controller::class, 'getUrusanOpd']);
    // Route::get('/get-nama-bidang-urusan/{kode_bidang_urusan}', [Bab1Controller::class, 'getNamaBidangUrusan']);
    
    
    
    
});
});
