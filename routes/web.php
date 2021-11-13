<?php

use Illuminate\Support\Facades\Route;
// use App\http\controllers\yourcontroller
use App\Http\Controllers\AbsensiController;
use App\http\Controllers\ChartsController;
use App\Http\Controllers\WelcomeController;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

// use TCG\Voyager\Voyager;

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
// routing welcome dengan controller welcomecontroller
Route::get('/', [WelcomeController::class,'index']);

// routing laravel voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// routing setelah login autentikasi
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// untuk home

// routing for chart
Route::get('charts', [ChartsController::class,'charts']);
// end

// excel absensis
Route::get('absensis/export_excel',[AbsensiController::class,'export_excel']);
// end absensis excel