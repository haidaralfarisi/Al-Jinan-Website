<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User as Model;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    private $viewIndex = 'user_index';
    private $viewCreate = 'user_form';
    private $viewEdit = 'user_form';
    private $viewShow = 'user_show';
    private $routePrefix = 'user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminView.' .$this->viewIndex,[
            'models' => Model::where('role', '<>', 'admin')
                //kondisi untuk tidak menampilkan role admin

                //latest untuk menampilkan data yang paling awal itu berada di no.1
                ->latest()
                ->paginate(50)
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
            'title' => 'Tambah Data User',
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' => 'SIMPAN',
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
            'fullname' => 'required',
            'username' => 'required',
            'role' => 'required|in:pendaftar,pengelola',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['email_verified_at'] = now();
        Model::create($requestData);
        // flash('Data berhasil di simpan');
        // return back()->with('success', 'Registration successfull!');
        return redirect()->route('user.index')->with('success', 'Add Data successfull!');
        // return redirect('/admin/user')->with('success', 'Registration successfull! Pleas Login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Model::findOrFail($id); // Ambil data user berdasarkan ID

        return view('AdminView.user_profile', compact('user'));
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
            'title' => 'Edit Data User',
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' =>  [$this->routePrefix.'.update',$id],
            'button' => 'UPDATE'
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
            'fullname' => 'required',
            'username' => 'required|unique:users,username,'.$id, // Validasi unik untuk username
            'role' => 'required|in:pendaftar,pengelola', // Memperbolehkan 'pendaftar' dan 'pengelola'
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'nullable',
        ]);

        // dd($requestData); // Tampilkan data request untuk memastikan nilai 'role'

        $model = Model::findOrFail($id);


        if($requestData['password'] == ""){
            unset($requestData['password']);
        }else{
            $requestData['password'] = bcrypt($requestData['password']);
        }
        // dd($requestData);

        $model->fill($requestData);
        $model->save();

        // flash('Data berhasil di simpan');
        return redirect()->route('user.index')->with('success', 'Update Data successfull!');
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


        if($model->role == 'pengelola' || $model->role == 'admin'){
            flash('Data tidak boleh di hapus')->error();
            return back();
        }
        //bahwa data/id tersebut tidak bisa di hapus


        Profile::where('user_id', $id)->delete();

        // $model = Model::findOrFail($id);
        $model->delete();

        return back()->with('success', 'Delete Data successfull!');

    }
}
