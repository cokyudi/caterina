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
        $data['menu'] = Menu::select('*')->where('id_user','=',$userId)->where('status_menu','!=',2)->get();
        $data['userId'] = $userId;
        $data['title'] = 'Dashboard Menu';
        return view('catering.menu', $data);
    }

    public function detail($id)
    {
        $userId = Auth::user()->id;
        //$data['detailItem'] = MenuItem::select('menu_item.*','item.nama_item', 'item.harga', 'item.qty', 'item.satuan', 'item.kategori')
                                        //->join('item', 'menu_item.id_item', '=', 'item.id')
                                        //->where('id_menu',$id)->get();
        /*$data['MenuTitle'] = MenuItem::select('*')
                                        ->join('menu', 'menu_item.id_menu', '=', 'menu.id')
                                        ->where('id_menu',$id)->first();
        $data['item'] = Item::select('*')->where('id_user','=',$userId)->where('status_item','=',1)->get();
        $data['title'] = 'Detail Item';
        $data['userId'] = $userId;

        return view('catering.detailItem', $data);*/
        $data['detailItem'] = Menu::where('id',$id)->with('items')->first();
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
        if (isset($request->nama_menu))
            $menu->nama_menu=$request->nama_menu;
        if (isset($request->status_menu))
            $menu->status_menu = $request->status_menu;
        $menu->save();
    }

    public function deleteMenu($id)
    {
        Menu::find($id)->delete();
    }

    public function addMenuItem(Request $request)
    {
        MenuItem::create($request->all());

        $item = Item::find($request->id_item);

        $menu = Menu::find($request->id_menu);
        $menu->harga += ($item->harga/$item->qty)*$request->qty_default;
        $menu->save();
    }

    public function updateMenuItem(Request $request, $id)
    {
        $menuItem = MenuItem::find($id);
        $item = Item::find($menuItem->id_item);
        $menu = Menu::find($menuItem->id_menu);

        $menu->harga -= ($item->harga/$item->qty)*$menuItem->qty_default;

        $menuItem->qty_default = $request->qty_default;
        $menuItem->id_item = $request->id_item;
        $menuItem->save();

        $item = Item::find($request->id_item);
        $menu->harga += ($item->harga/$item->qty)*$request->qty_default;
        $menu->save();
    }

    public function deleteMenuItem($id)
    {
        $menuItem = MenuItem::find($id);
        $item = Item::find($menuItem->id_item);
        $menu = Menu::find($menuItem->id_menu);

        $menu->harga -= ($item->harga/$item->qty)*$menuItem->qty_default;
        $menu->save();

        $menuItem->delete();
        echo $menu->harga;
    }
}
