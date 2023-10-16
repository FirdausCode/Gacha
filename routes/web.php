<?php

use App\Http\Controllers\HadiahController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// MAIN UTAMA/ROOT UTAMA
Route::get('/', [MainController::class, 'welcome'])->name('welcome');
Route::get('/pilih/wilayah/', [MainController::class, 'pilihWilayah'])->name('pilih.wilayah');
Route::get('/pilih/hadiah/{id}', [MainController::class, 'pilihHadiah'])->name('pilih.hadiah');
Route::get('/pilih/hadiah/undiPemenang/{id}', [MainController::class, 'undiPemenang'])->name('undiPemenang');
Route::get('/pilih/hadiah/undiPemenang/hasilUndi/{id}', [MainController::class, 'hasilUndi'])->name('hasilUndi');


Route::get('/api', [MainController::class, 'getApi'])->name('getApi');



// DASHBOARD UTAMA
Route::get('/admin/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

// CRUD WILAYAH
Route::get('/admin/wilayah', [WilayahController::class, 'index'])->name('index.wilayah');
Route::get('/admin/wilayah/create', [WilayahController::class, 'create'])->name('create.wilayah');
Route::post('/admin/wilayah/store', [WilayahController::class, 'store'])->name('store.wilayah');
Route::get('/admin/wilayah/edit/{id}', [WilayahController::class, 'edit'])->name('edit.wilayah');
Route::put('/admin/wilayah/update/{id}', [WilayahController::class, 'update'])->name('update.wilayah');
Route::delete('/admin/wilayah/destroy/{id}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');

// CRUD HADIAH
Route::get('/admin/hadiah', [HadiahController::class, 'index'])->name('index.hadiah');
Route::get('/admin/hadiah/create', [HadiahController::class, 'create'])->name('create.hadiah');
Route::post('/admin/hadiah/store', [HadiahController::class, 'store'])->name('store.hadiah');
Route::get('/admin/hadiah/edit/{id}', [HadiahController::class, 'edit'])->name('edit.hadiah');
Route::put('/admin/hadiah/update/{id}', [HadiahController::class, 'update'])->name('update.hadiah');
Route::delete('/admin/hadiah/destroy/{id}', [HadiahController::class, 'destroy'])->name('hadiah.destroy');

// CRUD NASABAH
Route::get('/admin/nasabah', [NasabahController::class, 'index'])->name('index.nasabah');
Route::get('/admin/nasabah/create', [NasabahController::class, 'create'])->name('create.nasabah');
Route::post('/admin/nasabah/store', [NasabahController::class, 'store'])->name('store.nasabah');
Route::get('/admin/nasabah/edit/{id}', [NasabahController::class, 'edit'])->name('edit.nasabah');
Route::put('/admin/nasabah/update/{id}', [NasabahController::class, 'update'])->name('update.nasabah');
Route::delete('/admin/nasabah/destroy/{id}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');


// DATA PEMENANG
Route::get('/nasabah', [MainController::class, 'index'])->name('index.nasabah');




