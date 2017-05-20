<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activateCatering()
    {
        $data['title'] = 'Daftarkan Catering Saya';
        return view('catering.daftarCatering', $data);
    }
}
