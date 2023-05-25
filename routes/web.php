<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', [DashboardController::class,'index'])->nama('dashboard');
        Route::resource('petugas','PetugasController');
        Route::resource('pengaduans','PengaduanController');
        Route::resource('tanggapan','TanggapanController');
    });

Route::prefix('kepala')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', [KepalaDinasController::class,'index'])->nama('masyarakat-dashboard');
    });

Route::prefix('user')
    ->middleware(['auth', 'MasyarakatController'])
    ->group(function(){
        Route::get('/', [MasyarakatController::class,'index'])->nama('masyarakat-dashboard');
        Route::resource('pengaduan','MayarakatController');
    });
