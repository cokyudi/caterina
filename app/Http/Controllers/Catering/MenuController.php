<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\MenuItem;
use App\Item;
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
        $userId = Auth::user()->id;
        $data['detailItem'] = MenuItem::select('menu_item.*','item.nama_item', 'item.harga', 'item.qty', 'item.satuan', 'item.kategori')
                                        ->join('item', 'menu_item.id_item', '=', 'item.id')
                                        ->where('id_menu',$id)->get();
        $data['MenuTitle'] = MenuItem::select('*')
                                        ->join('menu', 'menu_item.id_menu', '=', 'menu.id')
                                        ->where('id_menu',$id)->first();
        $data['item'] = Item::select('*')->where('id_user','=',$userId)->where('status_item','=',1)->get();
        $data['title'] = 'Detail Item';
        $data['userId'] = $userId;
        return view('catering.detailItem', $data);
    }

    public function addMenu(Request $request)
    {
        //return print_r($request);
        Menu::create($request->all());
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->nama_menu=$request->nama_menu;
        $menu->save();
    }

    public function deleteMenu($id)
    {
        Menu::find($id)->delete();
    }

    public function addMenuItem(Request $request)
    {
        MenuItem::create($request->all());
    }

    public function updateMenuItem(Request $request, $id)
    {
        $menuItem = MenuItem::find($id);
        $menuItem->qty_default=$request->qty_default;
        $menuItem->id_item=$request->id_item;
        $menuItem->save();
    }

    public function deleteMenuItem($id)
    {
        MenuItem::find($id)->delete();
    }
}
