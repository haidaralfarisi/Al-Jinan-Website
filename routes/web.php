<?php

use App\Http\Controllers\Admin\BerandaAdminController;
use App\Http\Controllers\Pendaftar\BerandaPendaftarController;
use App\Http\Controllers\Pengelola\BerandaPengelolaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('ClientView.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// pengelola beranda
Route::prefix('pengelola')->middleware(['auth', 'auth.pengelola'])->group(function(){

    Route::get('beranda', [BerandaPengelolaController::class, 'index'])->name('pengelola.index');
});


// pendaftar beranda
Route::prefix('pendaftar')->middleware(['auth', 'auth.pendaftar'])->group(function(){

    Route::get('beranda', [BerandaPendaftarController::class, 'index'])->name('pendaftar.index');
});

// pendaftar beranda
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function(){

    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.index');
});

Route::get('logout', function(){
    Auth::user()->logout();
});
