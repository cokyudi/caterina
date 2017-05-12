<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function catering()
    {
        $data['title'] = 'Nama Catering';
        return view('catering', $data);
    }

    public function menu()
    {
        $data['title'] = 'Nama Menu';
        return view('menu', $data);
    }
}
