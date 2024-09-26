<?php

namespace App\Http\Controllers;

use Exception;
use Mail;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{
    // public function index()
    // {
    //         'subject' => 'Haidar Tutor',
    //         'body' => 'Hello this is my email'
    //     ];
    //     try {
    //         FacadesMail::to('haidaralfarisi24@gmail.com')->send(new SendEmail($data));
    //         return response()->json(['Great check yout mail box']);
    //     } catch (Exception $th) {
    //         return response()->json(['error' => $th->getMessage()]);        }
    // }
}
