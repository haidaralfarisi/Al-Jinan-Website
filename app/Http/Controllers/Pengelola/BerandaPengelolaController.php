<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class BerandaPengelolaController extends Controller
{
    public function index()
    {
        $countUsers = User::whereNotIn('role', ['pengelola', 'admin'])->count();

        $countStatus = Pendaftaran::whereIn('row_status', ['Diterima'])->count();

        $countStatus2 = Pendaftaran::whereIn('row_status', ['Ditolak'])->count();


        $countPendaftarans = Pendaftaran::count();


        return view('PengelolaView.index', compact('countUsers','countPendaftarans','countStatus','countStatus2'));
    }


    private $viewIndex = 'pengelola_index';
    private $viewCreate = 'pengelola_form';
    private $viewEdit = 'pengelola_form';
    private $viewShow = 'pengelola_show';
    private $routePrefix = 'pengelola';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pengelola()
    {
        // return view('PendaftarView.' .$this->viewIndex,[
        //     'models' => Model::latest()
        //         ->paginate(50),
        //         'title' => 'Pendaftaran'

        // ]);

        $id= Auth::id();

        $pendaftaran = Pendaftaran::with('users', 'mayits', 'blok_makams')
        ->latest()
        ->paginate(50);

            return view('PengelolaView.' .$this->viewIndex,[
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
        return view('PengelolaView.' .$this->viewCreate, $data);
    }

    public function edit($id)
    {
        $data = [
            'model' => Pendaftaran::with('users', 'mayits', 'blok_makams')->findOrFail($id),
            'method' => 'PUT',
            'route' => ['user_pengelola.update', $id],
            'button' => 'Update'
        ];
        return view('PengelolaView.' .$this->viewCreate, $data);
    }

    public function update(Request $request, $id) {
        $requestData = $request->validate([
            'row_status' => 'required'
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($requestData);

        $rowStatus = $requestData['row_status'];
        $subject = '';
        $emailMessage = '';

        if ($rowStatus == 'Pending') {
            $subject = 'Status Pending';
            $emailMessage = 'Status Pendaftaran Pemakaman Sedang Di Proses';
        } elseif ($rowStatus == 'Diterima') {
            $subject = 'Status Diterima';
            $emailMessage = 'Selamat Pendaftaran Pemakaman Sudah Diterima.';
        } elseif ($rowStatus == 'Ditolak') {
            $subject = 'Status Ditolak';
            $emailMessage = 'Maaf Pendaftaran Pemakaman ditolak, mohon periksa kembali berkas kamu dan coba lagi.';
        }

        // Kirim email jika row_status adalah pending, diterima, atau ditolak
        if (in_array($rowStatus, ['Pending', 'Ditolak', 'Diterima'])) {
            Mail::to($pendaftaran->users->email)->send(new SendEmail($subject, $emailMessage, $rowStatus));
        }

        return redirect()->route('user_pengelola.pendaftar')->with('success', 'Update Data successful!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama_lengkap' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'golongan' => 'required',
    //         'tempat_lahir' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'tanggal_meninggal' => 'nullable',
    //         'alamat' => 'required',
    //         'bapak_kandung' => 'required',
    //     ]);

    //     // Create a new Mayit entry
    //     $data_mayit = [
    //         'nama_lengkap' => $validatedData['nama_lengkap'],
    //         'jenis_kelamin' => $validatedData['jenis_kelamin'],
    //         'golongan' => $validatedData['golongan'],
    //         'tempat_lahir' => $validatedData['tempat_lahir'],
    //         'tanggal_lahir' => $validatedData['tanggal_lahir'],
    //         'tanggal_meninggal' => $validatedData['tanggal_meninggal'],
    //         'alamat' => $validatedData['alamat'],
    //         'bapak_kandung' => $validatedData['bapak_kandung'],
    //     ];

    //     $mayit = Mayit::create($data_mayit);

    //     // Create a new Pendaftaran entry
    //     $data_pendaftaran = [
    //         'mayit_id' => $mayit->id, // Use the ID from the new Mayit entry
    //         'blok_makam_id' => $request->input('blok_makam'),
    //         'row_status' => 'pending',
    //         'user_id' => Auth::id(),
    //     ];

    //     Pendaftaran::create($data_pendaftaran);

    //     return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan');

    // }

    public function show($id)
    {
        return view('PengelolaView.' . $this->viewShow, [
            'model' => Pendaftaran::with('users', 'mayits', 'blok_makams')->findOrFail($id),
            'title' => 'Detail Pendaftaran'
        ]);
    }
}
