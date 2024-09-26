<?php

namespace App\Http\Controllers;

use App\Models\Blok_makam as Model;
use App\Http\Requests\StoreBlok_makamRequest;
use App\Http\Requests\UpdateBlok_makamRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;



class BlokMakamController extends Controller

{
    private $viewIndex = 'blok_makam_index';
    private $routePrefix = 'blok_makam';
    private $viewEdit = 'blok_makam_form';
    private $viewCreate = 'blok_makam_form';

    public function index()
    {

        $blokMakams = Model::with('tpus')->paginate(50);
        return view('AdminView.' . $this->viewIndex, [
            'models' => $blokMakams,
            'title' => 'List Blok Makam'
        ]);
    }

    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'blok_makams' => Model::all(), // Mengambil semua blok makam yang tersedia
            'title' => 'Tambah Blok Makam',
        ];
        return view('AdminView.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlok_makamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlok_makamRequest $request)
    {
        $requestData = $request->validate([
            'nama_blok' => 'required',
            'tpu_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kapasitas' => 'required',
            'harga_sewa' => 'required',
            'deskripsi' => 'nullable',
            'luas_blok' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('uploads/fotos', 'public');
            $requestData['foto'] = $path;
        }

        Model::create($requestData);

        return redirect()->route('blok_makam.index')->with('success', 'Add Data successfull!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model  $blok_makam
     * @return \Illuminate\Http\Response
     */
    public function show(Model $blok_makam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model  $blok_makam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' =>  [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Edit Blok Makam'


        ];
        return view('AdminView.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlok_makamRequest  $request
     * @param  \App\Models\Model  $blok_makam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama_blok' => 'required',
            'tpu_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kapasitas' => 'required',
            'harga_sewa' => 'required',
            'deskripsi' => 'nullable',
            'luas_blok' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('uploads/fotos', 'public');
            $requestData['foto'] = $path;
        }

        $model = Model::findOrFail($id);

        $model->fill($requestData);
        $model->save();

        return redirect()->route('blok_makam.index')->with('success', 'Update Data successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $blok_makam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $model = Model::findOrFail($id);

        // Check if the model's ID is 1 and prevent its deletion
        if ($model->id == 1) {
            return back()->with('error', 'Data tidak boleh dihapus');
        }

        // Delete the model
        $model->delete();

        // Redirect back with a success message
        return back()->with('success', 'Delete Data successful!');
    }
}
