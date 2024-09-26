<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tpu;
use App\Models\Blok_makam;
use App\Models\User;


class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blok = Blok_makam::with('tpus')->get();
        $tpu = Tpu::first();
        $user = User::whereHas('tpu')->with('tpu')->first();

        return view('ClientView.index', ['blokMakam'=>$blok,'tpu'=>$tpu, 'user'=>$user ]);
    }
}
