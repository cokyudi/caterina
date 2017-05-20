<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            ->where('id_user_pemesan', $id_user)
            ->orderBy('timestamp', 'DESC')->get();
        $data['item'] = TransaksiItem::
            join('item', 'item.id', 'transaksi_item.id_item')
            ->join('transaksi', 'transaksi.id', 'id_transaksi')
            ->where('id_user_pemesan', $id_user)->get();
        return view('pesanan', $data);
    }

    public function bayar(Request $request)
    {
        $transaksi = Transaksi::find($request->id_transaksi);
        if ($transaksi->kode_transaksi == $request->kode_transaksi) {
            $data['status'] = 'success';
            $transaksi->status_transaksi = 2;
            $transaksi->save();
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'Kode pembayaran salah';
        }
        echo json_encode($data);
    }

    public function diterima($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status_transaksi = 4;
        $transaksi->save();
        return redirect('/pesanan');
    }
}
