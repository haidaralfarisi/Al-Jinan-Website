<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        $profile = $user->profile;

        // Tentukan kondisi kelengkapan profil (misal: nik dan alamat harus diisi)
        $isProfileComplete = $profile && $profile->nik && $profile->alamat;

        // Pengecualian untuk role admin dan pengelola
        if ($user->role == 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->role == 'pengelola') {
            return redirect()->route('pengelola.index');
        }

        // Periksa kelengkapan profil untuk role lainnya
        if (!$isProfileComplete) {
            return redirect()->route('profile.index')->with('message', 'Lengkapi profil Anda terlebih dahulu');
        }

        // Arahkan sesuai role jika profil lengkap
        if ($user->role == 'pendaftar') {
            return redirect()->route('pendaftar.index');
        }

        // Jika role tidak dikenal, logout dan arahkan ke login
        Auth::logout();
        flash('Anda tidak memiliki hak akses')->error();
        return redirect()->route('login');
    }
}
