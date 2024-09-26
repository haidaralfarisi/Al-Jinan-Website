<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\Blok_makam;
use App\Models\Pendaftaran;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Mayit;
use Illuminate\Support\Facades\Auth;


class BerandaPendaftarController extends Controller
{
    public function index()
    {

        // $countUsers = User::whereNotIn('role', ['pengelola', 'admin'])->count();

        $countKapasitasBlokA = Blok_makam::where('id', 1 )->value('kapasitas');
        $countKapasitasBlokB = Blok_makam::where('id', 2 )->value('kapasitas');
        $countKapasitasBlokC = Blok_makam::where('id', 3 )->value('kapasitas');


        $countPendaftarans = Pendaftaran::count();


        return view('PendaftarView.index', compact('countKapasitasBlokA','countKapasitasBlokB','countKapasitasBlokC'));
    }

    private $viewIndex = 'pendaftaran_index';
    private $viewCreate = 'pendaftaran_form';
    private $viewEdit = 'pendaftaran_form';
    private $viewShow = 'pendaftaran_show';
    private $routePrefix = 'pendaftaran';

    private $profileShow = 'profile_show';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function pendaftar()
    {
        // return view('PendaftarView.' .$this->viewIndex,[
        //     'models' => Model::latest()
        //         ->paginate(50),
        //         'title' => 'Pendaftaran'

        // ]);

        $id= Auth::id();

        $pendaftaran = Pendaftaran::with('users', 'mayits', 'blok_makams')
        ->where('user_id', $id) // Assuming 'user_id' is the foreign key in your Model
        ->latest()
        ->paginate(50);

            return view('PendaftarView.' .$this->viewIndex,[
            'models' => $pendaftaran,
            'title' => 'Pendaftaran'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new Pendaftaran(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' => 'SIMPAN'
        ];
        return view('PendaftarView.' .$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'golongan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'nullable',
            'alamat' => 'required',
            'bapak_kandung' => 'required',
        ]);

        // Create a new Mayit entry
        $data_mayit = [
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'golongan' => $validatedData['golongan'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'tanggal_meninggal' => $validatedData['tanggal_meninggal'],
            'alamat' => $validatedData['alamat'],
            'bapak_kandung' => $validatedData['bapak_kandung'],
        ];

        $mayit = Mayit::create($data_mayit);

        // Create a new Pendaftaran entry
        $data_pendaftaran = [
            'mayit_id' => $mayit->id, // Use the ID from the new Mayit entry
            'blok_makam_id' => $request->input('blok_makam'),
            'row_status' => 'Review',
            'user_id' => Auth::id(),
        ];

        Pendaftaran::create($data_pendaftaran);

        return redirect()->route('user_pendaftar.pendaftar')->with('success', 'Pendaftaran berhasil ditambahkan');

    }

    // public function update(Request $request, $id)
    // {
    //     $requestData = $request->validate([
    //         'fullname' => 'required',
    //         'username' => 'required',
    //         'role' => 'required',
    //         'email' => 'required|unique:users,email,'.$id,
    //         'password' => 'nullable',
    //     ]);
    //     $model = Profile::findOrFail($id);
    //     if($requestData['password'] == ""){
    //         unset($requestData['password']);
    //     }else{
    //         $requestData['password'] = bcrypt($requestData['password']);
    //     }
    //     $model->fill($requestData);
    //     $model->save();

    //     // flash('Data berhasil di simpan');
    //     return redirect()->route('user.index')->with('success', 'Update Data successfull!');
    // }

    public function show($id)
    {
        return view('PendaftarView.' . $this->viewShow, [
            'model' => Pendaftaran::with('users', 'mayits', 'blok_makams')->findOrFail($id),
            'title' => 'Detail Pendaftaran'
        ]);
    }

}
