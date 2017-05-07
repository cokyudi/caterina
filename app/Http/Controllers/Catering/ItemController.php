<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $data['item'] = Item::select('*')->where('id_user','=',$userId)->where('status_item','=',1)->get();
        $data['userId'] = $userId;
        $data['title'] = 'Item Catering';
        return view('catering.item', $data);
    }

    public function addItem(Request $request)
    {
        //return print_r($request);
        Item::create($request->all());
    }

    public function updateItem(Request $request, $id)
    {
        $item = Item::find($id);
        //$item->id_item = $request->id_item;
        $item->nama_item=$request->nama_item;
        $item->harga=$request->harga;
        $item->qty=$request->qty;
        $item->satuan=$request->satuan;
        $item->kategori=$request->kategori;
        $item->id_user=$request->id_user;
        $item->save();
        return 'sss';
        //Item::create($request->all());
    }

}
