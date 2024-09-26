<?php

namespace App\Http\Controllers;

use App\Models\Profile as Model;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $viewIndex = 'user_index';
    private $viewCreate = 'user_form';
    private $viewEdit = 'profile_form';
    private $viewUpload = 'upload_bukti';
    private $viewShow = 'profile_show';
    private $routePrefix = 'profile';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $model = User::with('profile')->findOrFail($id);
        return view('PendaftarView.' . $this->viewShow, [
            'model' => $model,
            'title' => 'Profile'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('PendaftarView.' . $this->viewShow, [
            'model' => Model::with('users')->findOrFail($id),
            'title' => 'Detail Profile'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::with('profile')->findOrFail($id);

        $data = [
            'model' => $model,
            'method' => 'PUT',
            'route' =>  [$this->routePrefix . '.update', $id],
            'button' => 'SIMPAN',
            'title' => 'Profile'
        ];
        return view('PendaftarView.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'email' => 'required',
            'profile.foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'profile.nama_lengkap' => 'required',
            'profile.nik' => 'required|unique:profiles,nik,' . $id . ',user_id',
            'profile.umur' => 'nullable',
            'profile.no_telepon' => 'required|unique:profiles,no_telepon,' . $id . ',user_id',
            'profile.jenis_kelamin' => 'required',
            'profile.tempat_lahir' => 'required',
            'profile.tanggal_lahir' => 'required',
            'profile.alamat' => 'required',
            'profile.pekerjaan' => 'required',
        ]);

        $user = User::findOrFail($id);


        // Handle the profile photo upload
        if ($request->hasFile('profile.foto')) {
            // Delete old photo if exists
            if ($user->profile && $user->profile->foto) {
                Storage::delete(str_replace('storage/', 'public/', $user->profile->foto));
            }

            // Upload new photo
            $file = $request->file('profile.foto');
            $path = $file->store('public/photos');
            $requestData['profile']['foto'] = str_replace('public/', 'storage/', $path); // Adjust path for public access
        }

        $user->update(['email' => $requestData['email']]);

        if ($user->profile) {
            $user->profile->update($requestData['profile']);
        } else {
            $requestData['profile']['user_id'] = $user->id;
            $user->profile()->create($requestData['profile']);
        }

        return redirect()->route('profile.index')->with('success', 'Update Data successful!');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $profile)
    {
        //
    }
}
