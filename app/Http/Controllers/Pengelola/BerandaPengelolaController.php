<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaPengelolaController extends Controller
{
    public function index()
    {
        return view('PengelolaView.index');
    }
}
