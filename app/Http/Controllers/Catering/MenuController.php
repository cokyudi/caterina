<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\MenuItem;
use App\Item;
use App\GambarMenu;
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
        $data['menu'] = Menu::where('id_user','=',$userId)->where('status_menu','!=',2)->with('items','gambarMenu')->get();
        $data['harga'] = $this->calcPrice($data['menu'], $userId);
        $data['userId'] = $userId;
        $data['title'] = 'Dashboard Menu';
        return view('catering.menu', $data);
    }

    public function calcPrice($menu, $userId)
    {
        $menu_item = MenuItem::
            join('item', 'menu_item.id_item', 'item.id')
            ->where('id_user',$userId)->get();

        foreach ($menu as $key => $m) {
            $harga[$key] = 0;
            foreach ($menu_item as $mi) {
                if ($mi->id_menu == $m->id) {
                    $harga[$key] += ($mi->harga/$mi->qty)*$mi->qty_default;
                }
            }
        }
        if (isset($harga)) {
            return $harga;
        }

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
        $data['item'] = Item::select('*')->where('id_user','=',$userId)->where('status_item','=',1)->orderBy('kategori', 'ASC')->get();
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
    }

    public function updateMenuItem(Request $request, $id)
    {
        $menuItem = MenuItem::find($id);

        $menuItem->qty_default = $request->qty_default;
        $menuItem->id_item = $request->id_item;
        $menuItem->required = $request->required;
        $menuItem->save();
    }

    public function deleteMenuItem($id)
    {
        $menuItem = MenuItem::find($id);
        $menuItem->delete();
    }

    public function tambahGambar(Request $request){
        if ($request->_token) {
            $gambarMenu = new GambarMenu;
            $gambarMenu->id_menu = $request->id_menu;
            //if($request->hasFile('gambar_menu')){
                $path = $request->file('gambar_menu')->store('public/gambar_menu');
                $gambarMenu->gambar_menu = str_replace('public/gambar_menu', '', $path);
            //}
            $gambarMenu->save();
        }
        return redirect('/dashboard/menu');
    }

    public function updateGambar(Request $request){
        $id = $request->id;
        $gambarMenu = GambarMenu::find($id);
        $path = $request->file('gambar_menu')->store('public/gambar_menu');
        $gambarMenu->gambar_menu = str_replace('public/gambar_menu', '', $path);
        $gambarMenu->save();
        return redirect('/dashboard/menu');
    }
}
