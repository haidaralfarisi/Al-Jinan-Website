<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran as Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Mayit;
use App\Models\Blok_makam;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

use App\Mail\PendaftaranEmail;
use Illuminate\Support\Facades\Mail;




class PendaftaranController extends Controller
{
    private $viewIndex = 'pendaftaran_index';
    private $viewCreate = 'pendaftaran_form';
    private $viewEdit = 'pendaftaran_form';
    private $viewShow = 'pendaftaran_show';
    private $viewUpload = 'upload_bukti';
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

        // foreach ($pendaftaran as $pendaftar) {
        //     if ($pendaftar->row_status == 'Diterima') {
        //         Mail::to($pendaftar->users->email)->send(new PendaftaranEmail($pendaftar));
        //     }
        // }

        return view('PendaftarView.' .$this->viewIndex,[
            'models' => $pendaftaran,
            'title' => 'Pendaftaran'

        // if pendataran row status == pending ->kirim email

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
            'row_status' => 'Review',
            'user_id' => Auth::id(),
        ];

        Model::create($data_pendaftaran);


        $blokMakam =  Blok_makam::find($request->input('blok_makam'));


        $blokMakam->kapasitas -= 1;
        $blokMakam->save();

        return redirect()->route('user_pendaftar.pendaftar')->with('success', 'Pendaftaran berhasil ditambahkan');

    }

    public function update_upload(Request $request, $id)
    {
        $requestData = $request->validate([
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = User::findOrFail(Auth::id());
        $pendaftaran = $user->pendaftarans()->where('id', $id)->firstOrFail(); // Assuming $id is pendaftaran ID

        // Handle the profile photo upload
        if ($request->hasFile('bukti_pembayaran')) {
            // Delete old photo if exists
            if ($pendaftaran->bukti_pembayaran) {
                Storage::delete(str_replace('storage/', 'public/', $pendaftaran->bukti_pembayaran));
            }

            // Upload new photo
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('public/photos');
            $requestData['bukti_pembayaran'] = str_replace('public/', 'storage/', $path); // Adjust path for public access
        }

        $pendaftaran->update(['bukti_pembayaran' => $requestData['bukti_pembayaran']]);

        return redirect()->route('user_pendaftar.pendaftar')->with('success', 'Update Data successful!');
    }


    public function upload_bukti($id)
    {
        $model = Pendaftaran::with('users')->findOrFail($id);

        $data = [
            'model' => $model,
            'method' => 'PUT',
            'route' =>  [$this->routePrefix . '.update_upload', $id],
            'button' => 'KIRIM',
            'title' => 'Upload Bukti'
        ];
        return view('PendaftarView.' . $this->viewUpload, $data);
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
            'title' => 'Pendaftaran'
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
