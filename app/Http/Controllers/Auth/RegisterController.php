<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Buat pengguna baru
        $user = User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'role' => 'pendaftar',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Buat entri profil baru dengan user_id dari pengguna yang baru dibuat
        $user->profile()->create([
            'foto' => 'default.jpg', // Anda dapat menyesuaikan ini dengan nilai default atau mengubah sesuai kebutuhan
            'nama_lengkap' => $data['fullname'],
            'nik' => null, // Nilai default atau Anda dapat menyesuaikannya
            'umur' => null, // Nilai default atau Anda dapat menyesuaikannya
            'no_telepon' => '', // Nilai default atau Anda dapat menyesuaikannya
            'jenis_kelamin' => null, // Nilai default atau Anda dapat menyesuaikannya
            'tempat_lahir' => '', // Nilai default atau Anda dapat menyesuaikannya
            'alamat' => '', // Nilai default atau Anda dapat menyesuaikannya
            'tanggal_lahir' => null, // Nilai default atau Anda dapat menyesuaikannya
            'pekerjaan' => '', // Nilai default atau Anda dapat menyesuaikannya
        ]);

        return $user;
    }


    protected function registered(Request $request, $user)
    {
      // Cek apakah user memiliki profile
    $hasProfile = $user->profile()->exists();

    // Cek kelengkapan profile, misalnya nama_lengkap dan alamat harus diisi
    $profile = $user->profile;
    $isProfileComplete = $profile && $profile->nama_lengkap && $profile->alamat;

    if ($user->role == 'admin') {
        return $isProfileComplete ? redirect()->route('admin.index') : redirect()->route('profile.index')->with('message', 'Lengkapi profil Anda terlebih dahulu');
    } elseif ($user->role == 'pengelola') {
        return $isProfileComplete ? redirect()->route('pengelola.index') : redirect()->route('profile.index')->with('message', 'Lengkapi profil Anda terlebih dahulu');
    } else {
        return $isProfileComplete ? redirect()->route('profile.index') : redirect()->route('profile.index')->with('message', 'Lengkapi profil Anda terlebih dahulu');
    }
    }

}
