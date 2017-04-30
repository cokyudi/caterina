<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Menu';
        return view('catering.menu', $data);
    }

    public function detail($id)
    {
        # code...
    }
}
