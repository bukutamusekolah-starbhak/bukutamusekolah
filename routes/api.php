<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data_tamusController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\AbsensiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// untuk api tamu
Route::get('data_tamus',[Data_tamusController::class,'index']);
Route::post('/data_tamus/store',[Data_tamusController::class,'store']);
Route::get('/data_tamus/{id?}',[Data_tamusController::class,'show']);
Route::post('/data_tamus/update/{id?}',[Data_tamusController::class,'update']);
Route::delete('/data_tamus/{id}',[Data_tamusController::class,'destroy']);

// Route::apiResources([
//     'ruangans' => TempatController::class,
// ]);
// untuk api ruangan
Route::get('ruangans',[TempatController::class,'index']);
Route::post('ruangans',[TempatController::class,'store']);
Route::get('ruangans/{id?}',[TempatController::class,'show']);
Route::put('ruangans/update/{id?}',[TempatController::class,'update']);
Route::delete('ruangans/{id}',[TempatController::class,'destroy']);

// untuk api absensi dan rekap hadir tamu
Route::get('absensis',[AbsensiController::class,'index']);
Route::get('absensis/{id}',[AbsensiController::class,'show']);
Route::post('absensis',[AbsensiController::class,'store']);
Route::put('absensis/update',[AbsensiController::class,'update']);