<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard Menu';
        return view('catering.menu', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Nasi Goreng';
        return view('catering.detailItem', $data);
    }
}
