<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

//Masyarakat
Route::prefix('user')
    ->middleware(['auth', 'user-access:user'])
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.home');
        Route::resource('pengaduans', UserController::class);
        Route::get('lihat',[UserController::class,'lihat'])->name('user.lihat');

    });

    
  
//Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('/pengaduan',PengaduanController::class);
    
});
