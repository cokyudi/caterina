<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Item;
use App\Transaksi;
use App\TransaksiItem;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function checkout(Request $request)
    {
        // data transaksi item
        $data_item = [];
        $total_harga = 0;
        foreach ($request->id_item as $key => $id_item) {
            $item = Item::find($id_item);
            $data_item[$key] = [
                'id_item' => $id_item,
                'qty_item' => $request->qty_item[$key],
                'satuan_item' => $item->satuan,
                'total_harga_item' => $item->harga/$item->qty*$request->qty_item[$key]
            ];
            $total_harga += $data_item[$key]['total_harga_item'];
        }

        // random kode transaksi
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // data transaksi
        $data_transaksi = [
            'id_menu' => $request->id_menu,
            'qty_transaksi' => $request->qty,
            'total_harga' => $total_harga,
            'id_user_pemesan' => Auth::user()->id,
            'alamat' => $request->alamat,
            'tanggal_diambil' => $request->tgl_diambil,
            'pesan' => $request->pesan,
            'kode_transaksi' => $code,
        ];
        Transaksi::create($data_transaksi);

        // tambah id_transaksi ke data transaksi item
        $transaksi = Transaksi::all()->last();
        foreach ($request->id_item as $key => $id_item) {
            $data_item[$key]['id_transaksi'] = $transaksi->id;
        }
        TransaksiItem::insert($data_item);

        return redirect('pesanan');
    }
}
