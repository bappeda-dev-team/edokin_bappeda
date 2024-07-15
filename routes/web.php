<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bab1Controller;

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
// Route::get('/dashboard/bab1', [App\Http\Controllers\DashboardController::class, 'bab1'])->name('layouts.admin.bab1.index');
// Route::get('/dashboard/create-bab1', [App\Http\Controllers\DashboardController::class, 'create_bab1'])->name('layouts.admin.bab1.create');
Route::get('/dashboard/create-bab1', [Bab1Controller::class, 'create'])->name('bab1.create');
Route::post('/dashboard/store-bab1', [Bab1Controller::class, 'store'])->name('bab1.store');
Route::get('/dashboard/edit-bab1/{id}', [Bab1Controller::class, 'edit'])->name('bab1.edit');
Route::put('/dashboard/update-bab1/{id}', [Bab1Controller::class, 'update'])->name('bab1.update');
Route::delete('/dashboard/delete-bab1/{id}', [Bab1Controller::class, 'destroy'])->name('bab1.destroy');
Route::get('/dashboard/bab1', [Bab1Controller::class, 'index'])->name('layouts.admin.bab1.index');
Route::get('/dashboard/bab2', [App\Http\Controllers\DashboardController::class, 'bab2'])->name('layouts.admin.bab2.index');
Route::get('/dashboard/create-bab2', [App\Http\Controllers\DashboardController::class, 'create_bab2'])->name('layouts.admin.bab2.create');

