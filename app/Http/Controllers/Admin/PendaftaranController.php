<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran as Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Mayit;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use Illuminate\Support\Facades\Gate as FacadesGate;

class PendaftaranController extends Controller
{
    private $viewIndex = 'pendaftaran_index';
    private $viewCreate = 'pendaftaran_form';
    private $viewEdit = 'pendaftaran_form';
    private $viewShow = 'pendaftaran_show';
    private $routePrefix = 'pendaftaran';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // return view('PendaftarView.' .$this->viewIndex,[
        //     'models' => Model::latest()
        //         ->paginate(50),
        //         'title' => 'Pendaftaran'

        // ]);

        $pendaftaran = Model::with('users', 'mayits', 'blok_makams')->paginate(50);
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
            'model' => new Model(),
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
    public function store(StorePendaftaranRequest $request)
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
            'row_status' => 'pending',
            'user_id' => Auth::id(),
        ];

        Model::create($data_pendaftaran);

        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('PendaftarView.' . $this->viewShow, [
            'model' => Model::with('users', 'mayits', 'blok_makams')->findOrFail($id),
            'title' => 'Detail Pendaftaran',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftaranRequest  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendaftaranRequest $request, Model $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $pendaftaran)
    {
        //
    }
}
