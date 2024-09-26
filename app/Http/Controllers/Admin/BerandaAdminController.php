<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Mayit;

use App\Models\User;

use App\Models\Blok_makam;


class BerandaAdminController extends Controller
{
    private $viewIndex = 'pendaftaran_index';
    private $viewShow = 'pendaftaran_show';


    public function index()
    {

        $countUsers = User::whereNotIn('role', ['pengelola', 'admin'])->count();

        $countStatus = Pendaftaran::whereIn('row_status', ['Diterima'])->count();


        $countPendaftarans = Pendaftaran::count();


        return view('AdminView.index', compact('countUsers','countPendaftarans','countStatus'));
    }

    public function pendaftar()
    {
        // return view('PendaftarView.' .$this->viewIndex,[
        //     'models' => Model::latest()
        //         ->paginate(50),
        //         'title' => 'Pendaftaran'

        // ]);

        $pendaftaran = Pendaftaran::with('users', 'mayits', 'blok_makams')->paginate(50);
        return view('AdminView.' .$this->viewIndex,[
            'models' => $pendaftaran,
            'title' => 'Pendaftaran'

        ]);
    }

    public function admin_pendaftaran($id)
    {
        return view('AdminView.' . $this->viewShow, [
            'model' => Pendaftaran::with('users', 'mayits', 'blok_makams')->findOrFail($id),
            'title' => 'Detail Pendaftaran'
        ]);
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

    if ($pendaftaran->id == '8') {
        flash('Data tidak boleh di hapus')->error();
        return back();
    }

    // Simpan ID mayit yang terkait
    $mayitId = $pendaftaran->mayit_id;

    $blokMakamId = $pendaftaran->blok_makam_id;
    $blokMakam = Blok_makam::find($blokMakamId);

    $blokMakam->kapasitas += 1;
    $blokMakam->save();

    // Hapus data di tabel pendaftaran terlebih dahulu
    $pendaftaran->delete();

    // Hapus data terkait di tabel mayit setelah data pendaftaran dihapus
    $mayit = Mayit::find($mayitId);
    if ($mayit) {
        $mayit->delete();
    }

    return back()->with('success', 'Delete Data successfull!');

    }
}
