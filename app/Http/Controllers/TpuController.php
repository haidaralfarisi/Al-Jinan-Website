<?php

namespace App\Http\Controllers;

use App\Models\Tpu as Model;
use App\Models\User;
use App\Http\Requests\StoreTpuRequest;
use App\Http\Requests\UpdateTpuRequest;
use App\Models\Blok_makam;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class TpuController extends Controller
{

    private $viewIndex = 'tpu_index';
    private $viewCreate = 'tpu_form';
    private $viewEdit = 'tpu_form';
    private $viewShow = 'tpu_show';
    private $routePrefix = 'tpu';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tpu =  Model::with('user')->paginate(50);
        return view('AdminView.' .$this->viewIndex,[
            'models' => $tpu,
            'title' => 'List TPU'

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
        'users' => User::where('role', 'pengelola')->get(),
        // 'users' => User::all(),// Mengambil semua pengguna
        'title' => 'Tambah Data TPU',
        'route' => $this->routePrefix.'.store',
        'method' => 'POST',
        'model' => new Model(),
        'button' => 'SIMPAN',
    ];

        return view('AdminView.' .$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTpuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTpuRequest $request)
    {

        $requestData = $request->validate([
            'nama_tpu' => 'required',
            'alamat' => 'required',
            'user_id' => 'required|exists:users,id', // Menambahkan validasi exists untuk user_id
            'luas_wilayah' => 'required',
        ]);

        $pengelola = User::where('id', $request->user_id)->where('role', 'pengelola')->first();
        if (!$pengelola) {
            return redirect()->back()->with('error', 'User yang dipilih bukan pengelola');
        }

        $requestData['user_id'] = $pengelola->id; // Gunakan id pengelola yang valid

        Model::create($requestData);

        return redirect()->route('tpu.index')->with('success', 'Add Data successfull!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function show(Model $tpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all(); // Pastikan ini diambil dengan benar

        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'users' => $users,
            'route' =>  [$this->routePrefix.'.update',$id],
            'button' => 'UPDATE',
            'title' => 'Edit'
        ];
        return view('AdminView.' .$this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTpuRequest  $request
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->validate([
            'nama_tpu' => 'required',
            'alamat' => 'required',
            'user_id' => 'required|exists:users,id', // Menambahkan validasi exists untuk user_id
            'luas_wilayah' => 'required',
        ]);

        $pengelola = User::where('id', $request->user_id)->where('role', 'pengelola')->first();
        if (!$pengelola) {
            return redirect()->back()->with('error', 'User yang dipilih bukan pengelola');
        }
        $model = Model::findOrFail($id);
        // $requestData['user_id'] = auth()->id();
        $requestData['user_id'] = $pengelola->id; // Gunakan id pengelola yang valid


        $model->fill($requestData);
        $model->save();


        // // Model::create($requestData);

        return redirect()->route('tpu.index')->with('success', 'Add Data successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tpu  $tpu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Find the model by its ID
    $model = Model::findOrFail($id);


    // Hapus model beserta blok makam terkait
    // Check if the model's ID is 1 and prevent its deletion
    if ($model->id == 1) {
        return back()->with('error', 'Data tidak boleh dihapus');
    }
    
    Blok_makam::where('tpu_id', $id)->delete();


    // Delete the model
    $model->delete();

    // Redirect back with a success message
    return back()->with('success', 'Delete Data successful!');
}
}
