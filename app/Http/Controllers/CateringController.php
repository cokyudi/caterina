<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\MenuItem;
use App\Item;
use App\Kategori;
use Auth;

class CateringController extends Controller
{
    public function catering($id)
    {
        $data['catering'] = User::find($id);
        $data['title'] = $data['catering']->nama_catering;
        $data['menu'] = Menu::where([['status_menu', '1'], ['id_user', $id]])->get();
        $data['harga'] = $this->calcPrice($data['menu'], $id);
        return view('catering', $data);
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

    public function menu($id)
    {
        $data['menu'] = Menu::find($id);
        $data['menu_item'] = MenuItem::select('*', 'menu.harga as harga_menu', 'item.harga as harga')
            ->join('item', 'item.id', '=', 'menu_item.id_item')
            ->join('menu', 'menu.id', '=', 'menu_item.id_menu')
            ->where('id_menu', $id)->get();
        $data['item'] = Item::where('id_user', $data['menu']->id_user)->get();
        $data['kategori'] = Kategori::get();
        $data['title'] = $data['menu']->nama_menu;
        return view('menu', $data);
    }
}
