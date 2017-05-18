<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['card'] = Home::select('*')->where('status_catering','=',1)->get();
        $data['title'] = 'Caterina';
        return view('home')->with($data);
    }

    public function cari(Request $request)
    {
        $cari = $request->pencarian;
        $data['card'] = Home::select('*')->where('status_catering','=',1)->where('nama_catering','like','%'. $cari .'%')->get();
        $data['title'] = 'Cari "nama catering"';
        return view('cari', $data);
    }


}
