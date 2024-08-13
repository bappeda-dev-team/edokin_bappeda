<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bab1Controller;
use App\Http\Controllers\Bab3Controller;
use App\Http\Controllers\OPDController;
use App\Http\Controllers\PegawaiController;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Bab1;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

Route::get('/dashboard/bab2', [App\Http\Controllers\DashboardController::class, 'bab2'])->name('layouts.admin.bab2.index');
// Route::get('/dashboard/bab3', [App\Http\Controllers\DashboardController::class, 'bab3'])->name('layouts.admin.bab3.index');
Route::get('/dashboard/create-bab2', [App\Http\Controllers\DashboardController::class, 'create_bab2'])->name('layouts.admin.bab2.create');

Route::get('/dashboard/bab3', [Bab3Controller::class, 'index'])->name('layouts.admin.bab3.index');
Route::get('/dashboard/create-bab3', [Bab3Controller::class, 'create'])->name('bab3.create');
Route::post('/dashboard/store-bab3', [Bab3Controller::class, 'store'])->name('bab3.store');
Route::get('/dashboard/edit-bab3/{id}', [Bab3Controller::class, 'edit'])->name('bab3.edit');
Route::get('/dashboard/show-bab3/{id}', [Bab3Controller::class, 'show'])->name('bab3.show');
Route::put('/dashboard/update-bab3/{id}', [Bab3Controller::class, 'update'])->name('bab3.update');
Route::delete('/dashboard/delete-bab3/{id}', [Bab3Controller::class, 'destroy'])->name('bab3.destroy');

Route::get('/dashboard/bab1/export-pdf/{id}', [Bab1Controller::class, 'exportPdf'])->name('bab1.exportPdf');
Route::get('/dashboard/bab1/export-word/{id}', [Bab1Controller::class, 'exportWord'])->name('bab1.exportWord');

// Route::delete('/dashboard/delete-bab1/{id}', [Bab1Controller::class, 'destroy'])->name('bab1.destroy');
Route::get('/api/urusan_opd/{kode_opd}', [Bab1Controller::class, 'getUrusanOpd']);
// Route::get('/api/bidang_urusan/{kode_bidang_urusan}', [Bab1Controller::class, 'getBidangUrusan']);
// Route::get('/get-bidang-urusan/{kode_opd}', [Bab1Controller::class, 'getUrusanOpd']);
// Route::get('/get-nama-bidang-urusan/{kode_bidang_urusan}', [Bab1Controller::class, 'getNamaBidangUrusan']);



