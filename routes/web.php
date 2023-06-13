<?php

use App\Http\Controllers\AdminController;
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
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
});
  
//Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
});
