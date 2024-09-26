<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mayit as Model;
use Illuminate\Support\Facades\Log;



class MayitController extends Controller
{
    private $viewIndex = 'mayit_index';
    private $viewCreate = 'mayit_form';
    private $viewEdit = 'mayit_form';
    private $viewShow = 'mayit_show';
    private $routePrefix = 'mayit';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminView.' .$this->viewIndex,[
            'models' => Model::latest()
                ->paginate(50)
        ]);

        $tpu =  Model::with('mayits')->paginate(50);
        return view('PendaftarView.' .$this->viewIndex,[
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
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' => 'SIMPAN',
            'title' => 'FORM MAYIT'
        ];
        return view('AdminView.' .$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'golongan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'nullable',
            'alamat' => 'required',
            'bapak_kandung' => 'required',
        ]);

        try {
            $mayit = Model::create($requestData);
            if ($mayit) {
                Log::info('Data berhasil disimpan', ['data' => $mayit]);
                return redirect()->route('mayit.index')->with('success', 'Data berhasil ditambahkan!');
            } else {
                Log::error('Data gagal disimpan', ['data' => $requestData]);
                return redirect()->back()->with('error', 'Gagal menambahkan data');
            }
        } catch (\Exception $e) {
            Log::error('Exception saat menyimpan data', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('AdminView.' .$this->viewShow,[
            'model' => Model::findOrFail($id),
            'title' => 'Detail Mayit'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' =>  [$this->routePrefix.'.update',$id],
            'button' => 'UPDATE',
            'title' => 'Edit Data Mayit'

        ];
        return view('AdminView.' .$this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'golongan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'nullable',
            'alamat' => 'required',
            'bapak_kandung' => 'required',
        ]);
        $model = Model::findOrFail($id);
        
        $model->fill($requestData);
        $model->save();

        // flash('Data berhasil di simpan');
        return redirect()->route('mayit.index')->with('success', 'Update Data successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Model::findOrFail($id);

        if($model->id == '8'){
            flash('Data tidak boleh di hapus')->error();
            return back();
        }
        //bahwa data/id tersebut tidak bisa di hapus

        $model = Model::findOrFail($id);
        $model->delete();

        return back()->with('success', 'Delete Data successfull!');

    }
}
