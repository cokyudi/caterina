<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use Auth;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $data['menu'] = Menu::select('*')->where('id_user','=',$userId)->where('status_menu','=',1)->get();
        $data['userId'] = $userId;
        $data['title'] = 'Dashboard Menu';
        return view('catering.menu', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Nasi Goreng';
        return view('catering.detailItem', $data);
    }

    public function addMenu(Request $request)
    {
        //return print_r($request);
        Menu::create($request->all());
    }
}
