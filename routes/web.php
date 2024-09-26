<?php

use App\Http\Controllers\Admin\BerandaAdminController;
use App\Http\Controllers\Pendaftar\BerandaPendaftarController;
use App\Http\Controllers\Pengelola\BerandaPengelolaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlokMakamController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MayitController;
use App\Http\Controllers\TpuController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Pendaftar;
use App\Models\Blok_makam;
use App\Models\Pendaftaran;
use App\Models\Tpu;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;


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

// Route::get('/', function () {
//     return view('ClientView.index');
// });

Route::get('/', [ClientController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// pengelola beranda
Route::prefix('pengelola')->middleware(['auth', 'auth.pengelola'])->group(function() {
    Route::get('beranda', [BerandaPengelolaController::class, 'index'])->name('pengelola.index');
    Route::get('pengelola_pendaftaran', [BerandaPengelolaController::class, 'pengelola'])->name('pengelola_pendaftaran');
    Route::resource('pengelola_pendaftaran', BerandaPengelolaController::class)->except(['index', 'create']);
    Route::get('pendaftaran/create', [BerandaPengelolaController::class, 'create'])->name('pendaftaran.create');
    Route::resource('user_pengelola', BerandaPengelolaController::class);
    Route::get('user_pengelola', [BerandaPengelolaController::class, 'pengelola'])->name('user_pengelola.pendaftar');

});


// pendaftar beranda
Route::prefix('pendaftar')->middleware(['auth', 'auth.pendaftar'])->group(function(){

    Route::get('beranda', [BerandaPendaftarController::class, 'index'])->name('pendaftar.index');
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('mayit', MayitController::class);
    Route::resource('user_pendaftar', BerandaPendaftarController::class);
    Route::get('user_pendaftar', [BerandaPendaftarController::class, 'pendaftar'])->name('user_pendaftar.pendaftar');
    Route::resource('profile', ProfileController::class);
    Route::get('upload_bukti/{id}', [PendaftaranController::class,'upload_bukti'])->name('upload_bukti');
    Route::put('upload_bukti/{id}', [PendaftaranController::class,'update_upload'])->name('pendaftaran.update_upload');




});

// pendaftar beranda
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function(){

    Route::get('beranda', [BerandaAdminController::class, 'index'])->name('admin.index');
    Route::resource('user', UserController::class);
    Route::resource('mayit', MayitController::class);
    Route::resource('tpu', TpuController::class);
    Route::resource('blok_makam', BlokMakamController::class);
    // Route::resource('profile', ProfileController::class);


    // Route::resource('pendaftaran', PendaftaranController::class);

    Route::get('pendaftaran', [BerandaAdminController::class, 'pendaftar'])->name('admin.pendaftaran');
    Route::get('user/{id}/profile', [UserController::class, 'show'])->name('user.profile.show');
    Route::get('/pendaftaran/{id}', [BerandaAdminController::class, 'admin_pendaftaran'])->name('admin_pendaftaran.show');
    Route::resource('pendaftaran_admin',BerandaAdminController::class);

});

Route::get('/test-email', function () {
    $pendaftaran = App\Models\Pendaftaran::first(); // Atau ambil data pendaftaran yang ada
    Mail::to('haidaralfarisi24@gmail.com')->send(new App\Mail\PendaftaranEmail($pendaftaran));
    return 'Email Terkirim';
});

// Route::get('/send',[EmailController::class,'index']);

Route::get('logout', function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');
