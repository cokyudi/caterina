<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\TransaksiItem;
use Auth;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_user = Auth::user()->id;
        $data['id_user'] = $id_user;
        $data['title'] = 'Pesanan Catering';
        $data['transaksi'] = Transaksi::select('*', 'transaksi.id as id_transaksi')
            ->join('menu', 'menu.id', '=', 'transaksi.id_menu')
            ->join('users as pemesan', 'pemesan.id', 'transaksi.id_user_pemesan')
            ->where('menu.id_user', $id_user)
            ->orderBy('timestamp', 'DESC')->get();
        $data['item'] = TransaksiItem::
            join('item', 'item.id', 'transaksi_item.id_item')
            ->where('item.id_user', $id_user)->get();
        return view('catering.pesanan', $data);
    }

    public function dikirim($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status_transaksi = 3;
        $transaksi->save();
        return redirect('/dashboard/pesanan');
    }

    public function detailPesanan(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $detail = TransaksiItem::join('item', 'item.id', 'transaksi_item.id_item')->where('transaksi_item.id_transaksi', $id)->get();
            //return Response::json(array(view('catering.detailPesanan', $detail)));
            //return var_dump($detail);
            //return json_encode($detail);
            return view('catering.detailPesanan', compact('detail'));
        }
    }
}
