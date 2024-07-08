<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('layouts.admin.main');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('layouts.admin.dashboard');
Route::get('/dashboard/perangkat', [App\Http\Controllers\DashboardController::class, 'perangkat'])->name('layouts.admin.pegawai.index');
Route::get('/dashboard/pegawai', [App\Http\Controllers\DashboardController::class, 'pegawai'])->name('layouts.admin.pegawai.index');
Route::get('/dashboard/kata-pengantar', [App\Http\Controllers\DashboardController::class, 'pengantar'])->name('layouts.admin.katapengantar.index');
Route::get('/dashboard/daftar-isi', [App\Http\Controllers\DashboardController::class, 'daftar'])->name('layouts.admin.daftarisi.index');
Route::get('/dashboard/bab1', [App\Http\Controllers\DashboardController::class, 'bab1'])->name('layouts.admin.bab1.index');


