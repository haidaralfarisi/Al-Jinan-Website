<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaPendaftarController extends Controller
{
    public function index()
    {
        return view('PendaftarView.index');
    }
}
