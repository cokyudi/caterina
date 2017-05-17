<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'id',
        'id_menu',
        'qty_transaksi',
        'total_harga',
        'id_user_pemesan',
        'alamat',
        'tanggal_diambil',
        'pesan',
        'kode_transaksi',
    ];
    public $timestamps=false;
}
