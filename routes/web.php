<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\Data_tamusController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BacaKartuController;
use App\Http\Controllers\StatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// routing welcome
Route::get('/', function () {
    return view('welcome');
});

// routing laravel voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// routing autentikasi
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('template.master');
// });


// untuk routing tamu
// Route::get('/tamu', [PengunjungController::class, 'index']);
// Route::get('tamu.create', [PengunjungController::class, 'create']);
// Route::post('tamu/store', [PengunjungController::class, 'store']);
// Route::get('tamu/edit/{id}', [PengunjungController::class, 'edit']);
// Route::put('/tamu/update/{id}', [PengunjungController::class, 'update']);
// Route::delete('/tamu/destroy/{id}',[PengunjungController::class, 'destroy']);
// untuk routing tamu simple/ringkas
Route::resource('tamu',PengunjungController::class);

// untuk routing ruangan
Route::get('/ruangan', [TempatController::class, 'index']);
Route::get('ruangan.create', [TempatController::class, 'create']);
Route::post('ruangan/store', [TempatController::class, 'store']);
Route::get('ruangan/edit/{id}', [TempatController::class, 'edit']);
Route::put('/ruangan/update/{id}', [TempatController::class, 'update']);
Route::delete('/ruangan/destroy/{id}',[TempatController::class, 'destroy']);

// untuk display tamu
Route::resource('data_tamus', Data_tamusController::class);

// untuk routing absensi
Route::get('absensi', [AbsensiController::class, 'index']);
Route::post('absensi/store', [AbsensiController::class, 'store']);
Route::put('absensi/update/{id}', [AbsensiController::class, 'update']);
Route::get('absensi/export_excel',[AbsensiController::class, 'export_excel']);


// untuk routing kartu
Route::get('bacakartu', [BacaKartuController::class, 'bacakartu']);

// untuk routing mode absensi
Route::get('status', [StatusController::class, 'index']);
